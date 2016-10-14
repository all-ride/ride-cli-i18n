<?php

namespace ride\cli\command\i18n;

use ride\cli\command\AbstractCommand;

use ride\library\i18n\I18n;

/**
 * Command to search for a translation
 */
class TranslationSearchCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Shows an overview of the defined translations.');

        $this->addArgument('locale', 'Locale of the translation');
        $this->addArgument('query', 'Query to search the translations', false);
    }

    /**
     * Invokes the command
     * @param \ride\library\i18n\I18n $i18n
     * @param string $locale
     * @param string $query
     * @return null
     */
    public function invoke(I18n $i18n, $locale, $query = null) {
        $translator = $i18n->getTranslator($locale);
        $translations = $translator->getTranslations();

        if ($query) {
            foreach ($translations as $key => $translation) {
                if (strpos($key, $query) !== false || strpos($translation, $query) !== false) {
                    continue;
                }

                unset($translations[$key]);
            }
        }

        ksort($translations);

        foreach ($translations as $key => $translation) {
            $this->output->writeLine($key . ' = ' . $translation);
        }
    }

}
