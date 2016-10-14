<?php

namespace ride\cli\command\i18n;

use ride\cli\command\AbstractCommand;

use ride\library\i18n\I18n;

/**
 * Command to search for locales
 */
class LocaleSearchCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Shows an overview of the defined locales.');
    }

    /**
     * Invokes the command
     * @param \ride\library\i18n\I18n $i18n
     * @return null
     */
    public function invoke(I18n $i18n) {
        $locales = $i18n->getLocales();

        foreach ($locales as $locale) {
            $this->output->writeLine('- ' . $locale->getName() . ' [' . $locale->getCode() . ']');

            $properties = $locale->getProperties();
            foreach ($properties as $key => $value) {
                $this->output->writeLine('    #' . $key . ' = ' . $value);
            }
        }
    }

}
