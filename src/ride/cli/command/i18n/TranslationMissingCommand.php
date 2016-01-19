<?php

namespace ride\cli\command\i18n;

use ride\cli\command\AbstractCommand;

use ride\library\i18n\I18n;

/**
 * Command to search for a secured path
 */
class TranslationMissingCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Adds missing translation keys to the locales.');
    }

    /**
     * Invokes the command
     * @param \ride\library\i18n\I18n $i18n
     * @return null
     */
    public function invoke(I18n $i18n) {
        $translations = array();

        // get all locales
        $locales = $i18n->getLocales();

        // gather all translation keys
        foreach ($locales as $locale) {
            $translator = $i18n->getTranslator($locale);

            $localeTranslations = $translator->getTranslations();
            foreach ($localeTranslations as $key => $translation) {
                $translations[$key] = '[' . $key . ']';
            }
        }

        // add missing translation keys to all locales
        foreach ($locales as $locale) {
            $this->output->writeLine($locale);

            $translator = $i18n->getTranslator($locale);

            foreach ($translations as $key => $value) {
                $translation = $translator->getTranslation($key);
                if ($translation === null) {
                    $translator->setTranslation($key, $value);

                    $this->output->writeLine('- ' . $key);
                }
            }
        }
    }

}
