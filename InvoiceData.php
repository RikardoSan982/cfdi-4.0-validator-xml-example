<?php
declare(strict_types=1);

final class InvoiceData
{
    public function __construct(
        public readonly string $rfcEmisor,
        public readonly string $rfcReceptor,
        public readonly string $usoCfdi,
        public readonly float  $subtotal,
        public readonly float  $total,
        public readonly string $moneda = 'MXN'
    ) {}
}
