<?php
declare(strict_types=1);

final class InvoiceService
{
    public function __construct(
        private InvoiceValidator $validator,
        private CfdiXmlBuilder $builder
    ) {}

    /**
     * @return array{xml?: string, errors?: ValidationError[]}
     */
    public function generateXml(InvoiceData $data): array
    {
        $errors = $this->validator->validate($data);
        if (!empty($errors)) {
            return ['errors' => $errors];
        }

        return ['xml' => $this->builder->build($data)];
    }
}
