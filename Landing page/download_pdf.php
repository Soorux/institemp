<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('fpdf186/fpdf.php');

// Inicia el buffer de salida para evitar problemas con datos previos
ob_start();

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, utf8_decode('Información de InstiTemps'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    // Función para añadir un título de capítulo
    function ChapterTitle($title, $num = 0)
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode($title), 0, 1, 'L');
        $this->Ln(4);
    }

    // Función para añadir el contenido de un capítulo
    function ChapterBody($body)
    {
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, utf8_decode($body));
        $this->Ln();
    }

    // Función para agregar un índice automático
    function TableOfContents()
    {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, utf8_decode("Índice"), 0, 1, 'C');
        $this->Ln(10);
        $this->SetFont('Arial', '', 12);
        
        $this->Cell(10, 10, "1. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("¿Qué es InstiTemps?"), 0, 1);
        
        $this->Cell(10, 10, "2. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Historia de InstiTemps"), 0, 1);
        
        $this->Cell(10, 10, "3. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Misión de InstiTemps"), 0, 1);
        
        $this->Cell(10, 10, "4. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Visión de InstiTemps"), 0, 1);
        
        $this->Cell(10, 10, "5. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("¿Cómo Funciona InstiTemps?"), 0, 1);
        
        $this->Cell(10, 10, "6. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Beneficios de InstiTemps"), 0, 1);
        
        $this->Cell(10, 10, "7. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Precios y Planes de InstiTemps"), 0, 1);
        
        $this->Cell(10, 10, "8. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Servicios Adicionales"), 0, 1);
        
        $this->Cell(10, 10, "9. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Clientes de InstiTemps"), 0, 1);
        
        $this->Cell(10, 10, "10. ", 0, 0);
        $this->Cell(0, 10, utf8_decode("Contacta con InstiTemps"), 0, 1);
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Añadir índice automático
$pdf->TableOfContents();

// Agregar capítulos después del índice
$pdf->AddPage();

// Título del primer capítulo
$pdf->ChapterTitle(utf8_decode("¿Qué es InstiTemps?"));
$texto = "InstiTemps es una solución innovadora diseñada para monitorear, analizar y gestionar las variables ambientales más críticas de espacios cerrados y abiertos, como la temperatura y la humedad. Nuestra plataforma está enfocada en ofrecer datos precisos, en tiempo real, para garantizar un ambiente saludable y eficiente tanto en empresas como en hogares.";
$pdf->ChapterBody($texto);

$pdf->ChapterTitle(utf8_decode("Historia de InstiTemps"));
$texto_historia = "La idea de InstiTemps nació en el año 2020 cuando un grupo de ingenieros y empresarios identificaron la creciente necesidad de monitoreo ambiental en espacios industriales y residenciales. Durante una charla entre los fundadores, discutieron las dificultades de manejar equipos de monitoreo tradicionales que no ofrecían una visión clara ni accesible de los datos. Así fue como decidieron crear una plataforma que no solo recogiera datos, sino que también brindara alertas y análisis predictivos para optimizar los recursos y garantizar la salud de los usuarios.\n\nEn 2021, InstiTemps lanzó su primer prototipo, y desde entonces ha ayudado a cientos de empresas a mejorar su eficiencia operativa y a hogares a mantener un ambiente seguro y saludable.";
$pdf->ChapterBody($texto_historia);

$pdf->ChapterTitle(utf8_decode("Misión de InstiTemps"));
$texto_mision = "La misión de InstiTemps es proporcionar soluciones de monitoreo de temperatura y humedad que ayuden a prevenir daños a largo plazo en instalaciones, productos y personas. A través de nuestra plataforma, buscamos mejorar la calidad de vida y la eficiencia operativa de nuestros clientes, brindando información precisa y accesible para una toma de decisiones más informada.";
$pdf->ChapterBody($texto_mision);

$pdf->ChapterTitle(utf8_decode("Visión de InstiTemps"));
$texto_vision = "Nuestra visión es ser líderes en el monitoreo ambiental, brindando herramientas innovadoras y accesibles a nivel global. Buscamos ser la opción preferida para empresas, instituciones educativas y hogares, ayudando a mejorar la eficiencia energética, reducir riesgos y contribuir al bienestar general a través de la tecnología avanzada.";
$pdf->ChapterBody($texto_vision);

$pdf->ChapterTitle(utf8_decode("¿Cómo Funciona InstiTemps?"));
$texto_funcion = "InstiTemps emplea sensores de última generación para recopilar datos en tiempo real sobre temperatura y humedad en diversos ambientes. Estos datos son procesados y presentados a través de una plataforma online accesible desde cualquier dispositivo conectado a internet. Además, los usuarios reciben notificaciones en caso de que los niveles de temperatura o humedad se desvíen de los valores establecidos, permitiendo una respuesta rápida y eficiente.\n\nLa plataforma incluye análisis predictivos que utilizan los datos históricos para prever tendencias y ajustar las condiciones automáticamente.";
$pdf->ChapterBody($texto_funcion);

$pdf->ChapterTitle(utf8_decode("Beneficios de InstiTemps"));
$texto_beneficios = "1. **Monitoreo en tiempo real**: Obtén información precisa sobre las condiciones ambientales en cualquier momento.\n2. **Notificaciones automáticas**: Recibe alertas cuando los niveles de temperatura o humedad excedan los límites recomendados.\n3. **Análisis de tendencias**: Visualiza gráficas y análisis históricos para entender mejor los patrones y comportamientos de tu entorno.\n4. **Reducción de riesgos**: Prevé problemas antes de que se conviertan en una amenaza para tus instalaciones o productos.\n5. **Ahorro de energía**: Optimiza el uso de energía ajustando las condiciones del ambiente según los datos obtenidos.";
$pdf->ChapterBody($texto_beneficios);

$pdf->ChapterTitle(utf8_decode("Precios y Planes de InstiTemps"));
$texto_precios = "InstiTemps ofrece planes accesibles adaptados a diferentes necesidades:\n\n1. **Plan Básico**: Incluye monitoreo en tiempo real, alertas por correo electrónico, y acceso a los primeros 3 meses de análisis predictivos. Costo: $10/mes.\n2. **Plan Profesional**: Todo lo del Plan Básico, más soporte técnico 24/7, análisis avanzados y reportes detallados. Costo: $25/mes.\n3. **Plan Empresarial**: Todos los beneficios anteriores, más integración con sistemas de gestión de edificios inteligentes (BMS), y acceso ilimitado a análisis predictivos y personalización. Costo: $50/mes.";
$pdf->ChapterBody($texto_precios);

$pdf->ChapterTitle(utf8_decode("Servicios Adicionales"));
$texto_servicios = "Además de los planes básicos, InstiTemps ofrece los siguientes servicios:\n\n- **Consultoría personalizada**: Brindamos asesoría para optimizar el uso de nuestra plataforma en tu entorno específico.\n- **Instalación y configuración**: Nuestros técnicos te ayudarán a instalar y configurar los sensores y dispositivos de monitoreo.\n- **Integración de sistemas**: Podemos integrar nuestra plataforma con tus sistemas existentes, como plataformas de gestión de edificios (BMS).\n- **Soporte técnico 24/7**: Nuestro equipo de soporte está disponible en todo momento para ayudarte a resolver cualquier problema o duda que surja.";
$pdf->ChapterBody($texto_servicios);

$pdf->ChapterTitle(utf8_decode("Clientes de InstiTemps"));
$texto_clientes = "InstiTemps ha ayudado a una amplia gama de clientes, incluidos:\n- **Empresas industriales** que necesitan monitorear condiciones ambientales para la protección de sus productos.\n- **Instituciones educativas** que buscan optimizar el confort de sus instalaciones.\n- **Hogares** que desean garantizar un ambiente saludable y eficiente.\n- **Empresas del sector energético** que buscan reducir su consumo y mejorar la eficiencia operativa.\n- **Hospitales** que necesitan mantener condiciones estrictas para la seguridad de los pacientes.";
$pdf->ChapterBody($texto_clientes);

$pdf->ChapterTitle(utf8_decode("Contacta con InstiTemps"));
$texto_contacto = "Si deseas obtener más información o probar nuestra plataforma, no dudes en contactarnos:\n\n- **Correo Electrónico**: contacto@institemps.com\n- **Teléfono**: +1 (123) 456-7890\n- **Dirección**: Calle Ejemplo 123, Ciudad, País\n\nVisítanos en nuestro sitio web para más detalles: www.institemps.com";
$pdf->ChapterBody($texto_contacto);

// Finaliza el buffer y limpia la salida previa
ob_end_clean();

// Salida del PDF
$pdf->Output('D', 'InstiTemps.pdf');
exit;
?>
