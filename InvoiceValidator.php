<?php
declare(strict_types=1);

final class InvoiceValidator
{
    /** @return ValidationError[] */
    public function validate(InvoiceData $data): array
    {
        $errors = [];

        if (!$this->isValidRfc($data->rfcEmisor)) {
            $errors[] = new ValidationError('rfcEmisor', 'RFC emisor inválido');
        }

        if (!$this->isValidRfc($data->rfcReceptor)) {
            $errors[] = new ValidationError('rfcReceptor', 'RFC receptor inválido');
        }

        if ($data->subtotal <= 0) {
            $errors[] = new ValidationError('subtotal', 'Subtotal debe ser mayor a 0');
        }

        if ($data->total < $data->subtotal) {
            $errors[] = new ValidationError('total', 'Total no puede ser menor al subtotal');
        }

        if (!preg_match('/^[A-Z0-9]{3}$/', $data->usoCfdi)) {
            $errors[] = new ValidationError('usoCfdi', 'UsoCFDI inválido');
        }

        return $errors;
    }

    private function isValidRfc(string $rfc): bool
    {
        return (bool) preg_match('/^[A-ZÑ&]{3,4}\d{6}[A-Z0-9]{3}$/', $rfc);
    }
}
