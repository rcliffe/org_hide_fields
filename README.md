# Hide Organisation Fields

Hides selected fields on organisation contacts' add, edit and summary screens, including the
summary's inline edit forms. Individuals and households are not affected.

This is an [extension for CiviCRM](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/), licensed under [AGPL-3.0](LICENSE.txt).

## Getting Started

Choose the fields under **Administer › Customize Data and Screens › Hide Organisation Fields**:

- Nickname
- SIC Code
- Contact Source
- Email On Hold
- Email Bulk Mailings
- Phone (whole section)
- Organisation is closed (and date closed)
- External ID
- Contact ID
- Browse/Upload Image (edit form only; an existing image still shows on the summary)

Nickname, SIC Code, Contact Source, Email On Hold, Email Bulk Mailings and Phone are hidden by
default.

## Known Issues

- Fields are only hidden from view. Their stored values are kept and can still be changed
  through the API, imports and profiles.
- On the summary screen, an email's "(On Hold)" and "(Bulk)" notes are still shown next to
  the address, and a closed organisation's "Closed" notice or date closed is still shown;
  only the edit fields are hidden.
- Hiding uses the CSS `:has()` selector, supported by all current major browsers.
