<?php

namespace ride\cli\command\i18n;

use ride\cli\command\AbstractCommand;

use ride\library\i18n\I18n;

/**
 * Command to unset a translation
 */
class TranslationUnsetCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Unsets a translation from the provided locale.');

        $this->addArgument('locale', 'Locale of the translation');
        $this->addArgument('key', 'Key of the translation');
    }

    /**
     * Invokes the command
     * @param \ride\library\i18n\I18n $i18n
     * @param string $locale
     * @param string $key
     * @return null
     */
    public function invoke(I18n $i18n, $locale, $key) {
        $translator = $i18n->getTranslator($locale);
        $translator->setTranslation($key, null);
    }

}
