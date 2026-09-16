<?php
/** Lightweight shared form handling for Hostinger/PHP deployment. */
function site_form_clean(string $value, int $max = 500): string
{
    $value = trim(str_replace(["\r", "\0"], '', $value));
    return mb_substr($value, 0, $max);
}

function site_form_submit(array $fields, string $subjectPrefix, array $siteConfig): array
{
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
        return ['submitted' => false, 'success' => false, 'message' => ''];
    }

    if (trim((string)($_POST['website'] ?? '')) !== '') {
        return ['submitted' => true, 'success' => true, 'message' => 'Thank you. Your request has been received.'];
    }

    $values = [];
    $errors = [];
    foreach ($fields as $name => $definition) {
        $value = site_form_clean((string)($_POST[$name] ?? ''), (int)($definition['max'] ?? 500));
        if (($definition['required'] ?? false) && $value === '') {
            $errors[] = $definition['label'] . ' is required.';
        }
        if (($definition['type'] ?? '') === 'email' && $value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }
        if (($definition['type'] ?? '') === 'phone' && $value !== '' && !preg_match('/^[0-9+()\-\s]{7,20}$/', $value)) {
            $errors[] = 'Please enter a valid phone number.';
        }
        $values[$name] = $value;
    }

    if ($errors) {
        return ['submitted' => true, 'success' => false, 'message' => implode(' ', $errors), 'values' => $values];
    }

    $recipient = trim((string)($siteConfig['email'] ?? ''));
    if ($recipient === '' || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
        return ['submitted' => true, 'success' => false, 'message' => 'Email delivery is not configured yet. Please call us directly.', 'values' => $values];
    }

    $lines = [];
    foreach ($fields as $name => $definition) {
        $lines[] = $definition['label'] . ': ' . ($values[$name] !== '' ? $values[$name] : '—');
    }
    $message = implode("\n", $lines);
    $replyTo = $values['email'] ?? '';
    $headers = ['Content-Type: text/plain; charset=UTF-8'];
    $headers[] = 'From: ' . $siteConfig['site_name'] . ' <' . $recipient . '>';
    if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }

    $sent = @mail($recipient, $subjectPrefix . ' - Website Enquiry', $message, implode("\r\n", $headers));
    return $sent
        ? ['submitted' => true, 'success' => true, 'message' => 'Thank you. Your request has been sent to our team.', 'values' => []]
        : ['submitted' => true, 'success' => false, 'message' => 'We could not send the form right now. Please call or email us directly.', 'values' => $values];
}
