<?php
declare(strict_types=1);

final class CfdiXmlBuilder
{
    public function build(InvoiceData $data): string
    {
        $xml = new SimpleXMLElement('<Comprobante/>');
        $xml->addAttribute('Version', '4.0');
        $xml->addAttribute('Moneda', $data->moneda);
        $xml->addAttribute('SubTotal', number_format($data->subtotal, 2, '.', ''));
        $xml->addAttribute('Total', number_format($data->total, 2, '.', ''));

        $emisor = $xml->addChild('Emisor');
        $emisor->addAttribute('Rfc', $data->rfcEmisor);

        $receptor = $xml->addChild('Receptor');
        $receptor->addAttribute('Rfc', $data->rfcReceptor);
        $receptor->addAttribute('UsoCFDI', $data->usoCfdi);

        return $xml->asXML() ?: '';
    }
}
