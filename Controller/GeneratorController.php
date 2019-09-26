<?php
/*************************************************************************************/
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE      */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

/**
 * Created by Franck Allimant, CQFDev <franck@cqfdev.fr>
 * Date: 24/01/2019 19:38
 */

namespace PdfGenerator\Controller;

use PdfGenerator\PdfGenerator;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Event\PdfEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Exception\TheliaProcessException;
use Thelia\Log\Tlog;

class GeneratorController extends BaseFrontController
{
    public function downloadPdf($template, $outputFileName)
    {
        return $this->renderPdfTemplate($template, $outputFileName, false);
    }

    public function viewPdf($template, $outputFileName)
    {
        return $this->renderPdfTemplate($template, $outputFileName, true);
    }

    /**
     * @param $templateName
     * @param $outputFileName
     * @param $browser
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderPdfTemplate($templateName, $outputFileName, $browser)
    {
        $html = $this->renderRaw(
            $templateName,
            [],
            $this->getTemplateHelper()->getActivePdfTemplate()
        );

        try {
            $pdfEvent = new PdfEvent($html);

            $this->dispatch(TheliaEvents::GENERATE_PDF, $pdfEvent);

            if ($pdfEvent->hasPdf()) {
                return $this->pdfResponse($pdfEvent->getPdf(), $outputFileName, 200, $browser);
            }
        } catch (\Exception $e) {
            Tlog::getInstance()->error(
                sprintf(
                    'error during generating PDF document %s.html with message "%s"',
                    $templateName,
                    $e->getMessage()
                )
            );
        }

        throw new TheliaProcessException(
            $this->getTranslator()->trans(
                "We're sorry, this PDF document %name is not available at the moment.",
                [ '%name' => $outputFileName],
                PdfGenerator::DOMAIN_NAME
            )
        );
    }
}
