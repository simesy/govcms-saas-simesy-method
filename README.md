# DDEV for GovCMS SaaS

This is purely for GovCMS SaaS (not PaaS or any other Drupal).

## Key elements

1. `composer.json` replicates GovCMS SaaS
2. `.govcms` folder is git ignored - put your GovCMS clone there
3. `.data` is git ignored - put other stuff

## Setup

1. Git clone your govcms repo (assuming it's SaaS site) into `.govcms` directory.
2. Run `composer install`
3. Run `ddev start`
4. Run `ddev symlink-govcms` symlinks govcms folders into the right places
5. Run `ddev si minimal` and visit https://XXX.ddev.site`

## Sync data

1. Go to dashboard.govcms.gov.au and go to Tasks for your project.
2. Run SQL Dump task.
3. Download the database
4. `ddev import-db --file="/path/to/that/db.gz"

## Command reminders

```
ddev drush sapi-l
ddev drush sapi-i content

