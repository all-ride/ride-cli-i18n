# Ride: I18n CLI

This module adds various I18n commands to the Ride CLI.

## Commands

### locales

This command shows an overview of the defined locales.

**Syntax**: locales

**Alias**: l

### translation

This command shows an overview of the defined translations.

**Syntax**: ```translation <locale> [<query>]```
- ```<locale>```: Locale of the translation
- ```<query>```: Query to search the translations

**Alias**: ```t```

### translation set

This command sets a translation from the provided locale.

**Syntax**: ```translation set <locale> <key> <translation>```
- ```<locale>```: Locale of the translation
- ```<key>```: Key of the translation
- ```<translation>```: Value for the translation

**Alias**: ```ts```

### translation unset

This command unsets a translation from the provided locale.

**Syntax**: ```translation unset <locale> <key>```
- ```<locale>```: Locale of the translation
- ```<key>```: Key of the translation

**Alias**: ```tu```

### translation missing

This command makes sure all locales have the same keys defined by adding translation keys which are missing but defined in an other locale.

**Syntax**: ```translation missing```

**Alias**: ```tm```

## Related Modules 

- [ride/app](https://github.com/all-ride/ride-app)
- [ride/app-i18n](https://github.com/all-ride/ride-app-i18n)
- [ride/cli](https://github.com/all-ride/ride-cli)
- [ride/lib-cli](https://github.com/all-ride/ride-lib-cli)
- [ride/lib-i18n](https://github.com/all-ride/ride-lib-i18n)

## Installation

You can use [Composer](http://getcomposer.org) to install this application.

```
composer require ride/cli-i18n
```
