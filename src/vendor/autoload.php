<?php

    /*
     * Using PDFParser without Composer
     * https://github.com/smalot/pdfparser/issues/117
     * https://github.com/apmuthu
     */

    $vendorDir = '../vendor';

    $tcpdf_files = Array(
        'Datamatrix' => $vendorDir . '/tecnickcom/tcpdf/include/barcodes/datamatrix.php',
        'PDF417' => $vendorDir . '/tecnickcom/tcpdf/include/barcodes/pdf417.php',
        'QRcode' => $vendorDir . '/tecnickcom/tcpdf/include/barcodes/qrcode.php',
        'TCPDF' => $vendorDir . '/tecnickcom/tcpdf/tcpdf.php',
        'TCPDF2DBarcode' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_barcodes_2d.php',
        'TCPDFBarcode' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_barcodes_1d.php',
        'TCPDF_COLORS' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_colors.php',
        'TCPDF_FILTERS' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_filters.php',
        'TCPDF_FONTS' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_fonts.php',
        'TCPDF_FONT_DATA' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_font_data.php',
        'TCPDF_IMAGES' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_images.php',
        'TCPDF_IMPORT' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_import.php',
        'TCPDF_PARSER' => $vendorDir . '/tecnickcom/tcpdf/tcpdf_parser.php',
        'TCPDF_STATIC' => $vendorDir . '/tecnickcom/tcpdf/include/tcpdf_static.php'
    );

    foreach ($tcpdf_files as $key => $file) {
        include_once $file;
    }

    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Parser.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Document.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Header.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/PDFObject.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Encoding.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Font.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Page.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Pages.php";

    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementArray.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementBoolean.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementString.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementDate.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementHexa.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementMissing.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementName.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementNull.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementNumeric.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementStruct.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementXRef.php";

    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Encoding/StandardEncoding.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Encoding/ISOLatin1Encoding.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Encoding/ISOLatin9Encoding.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Encoding/MacRomanEncoding.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Encoding/WinAnsiEncoding.php";

    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Font/FontCIDFontType0.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Font/FontCIDFontType2.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Font/FontTrueType.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Font/FontType0.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/Font/FontType1.php";

    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/XObject/Form.php";
    include_once  $vendorDir . "/smalot/pdfparser/src/Smalot/PdfParser/XObject/Image.php";
    
?>