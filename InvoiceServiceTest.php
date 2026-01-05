<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class InvoiceServiceTest extends TestCase
{
    public function test_generates_xml_when_data_is_valid(): void
    {
        $service = new InvoiceService(new InvoiceValidator(), new CfdiXmlBuilder());

        $data = new InvoiceData(
            rfcEmisor: 'AAA010101AAA',
            rfcReceptor: 'XAXX010101000',
            usoCfdi: 'G03',
            subtotal: 100.00,
            total: 116.00
        );

        $result = $service->generateXml($data);

        $this->assertArrayHasKey('xml', $result);
        $this->assertStringContainsString('Version="4.0"', $result['xml']);
        $this->assertStringContainsString('Rfc="AAA010101AAA"', $result['xml']);
    }

    public function test_returns_errors_when_data_is_invalid(): void
    {
        $service = new InvoiceService(new InvoiceValidator(), new CfdiXmlBuilder());

        $data = new InvoiceData(
            rfcEmisor: 'INVALID',
            rfcReceptor: 'INVALID',
            usoCfdi: '??',
            subtotal: 0,
            total: -1
        );

        $result = $service->generateXml($data);

        $this->assertArrayHasKey('errors', $result);
        $this->assertNotEmpty($result['errors']);
    }
}
