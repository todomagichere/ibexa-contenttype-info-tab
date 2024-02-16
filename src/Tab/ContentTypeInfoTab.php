<?php

declare(strict_types=1);

namespace TodoMagicHere\IbexaContentTypeInfoTabBundle\Tab;

use Ibexa\Contracts\AdminUi\Tab\AbstractTab;
use Ibexa\Contracts\AdminUi\Tab\OrderedTabInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ContentTypeInfoTab extends AbstractTab implements OrderedTabInterface
{
    public function __construct(
        Environment $twig,
        TranslatorInterface $translator
    ) {
        parent::__construct($twig, $translator);

    }

    public function getIdentifier(): string
    {
        return 'content-type-information';
    }

    public function getName(): string
    {
        return 'Content Type Information';
    }

    public function getOrder(): int
    {
        return 3000;
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function renderView(array $parameters): string
    {
        return $this->twig->render('@IbexaContentTypeInfoTab/content_type_info_tab.html.twig', [
            'content_type' => $parameters['contentType'],
        ]);
    }

    public function getTemplateParameters(array $contextParameters = []): array
    {
        return $contextParameters;
    }
}
