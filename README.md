# DDEV for GovCMS SaaS

This is purely for GovCMS SaaS (not PaaS or any other Drupal). Suitable only for experienced
devs who

* Are working with GovCMS SaaS and dislike the local dev setup.
* Want to use a familiar DDEV setup.
* Happy to wrangle the composer.json a little to keep it in line with the GovCMS distro.
* Understand Drupal internals enough to keep the plates spinning.

## Key elements

1. `composer.json` replicates GovCMS SaaS
2. `.govcms` folder is git ignored - put your GovCMS clone there
3. `.data` is git ignored - put other stuff
4. A matching Solr should be ready to go, tested with one project

## Setup

1. Git clone your govcms repo (assuming it's SaaS site) into `.govcms` directory.
2. Update the project name in .ddev/config.yaml
3. Run `composer install`
4. Run `ddev start`
5. Run `ddev symlink-govcms` symlinks govcms folders into the right places
6. Run `ddev si minimal` and visit https://XXX.ddev.site`

## Sync data

This could be automated better since there is a database image available if you 
already have access to your client's project, but this is the simple manual
sync if I need it.

1. Go to dashboard.govcms.gov.au and go to Tasks for your project.
2. Run SQL Dump task.
3. Download the database
4. `ddev import-db --file="/path/to/that/db.gz"

## Caveats

There are some non-GovCMS modules in the composer.json for analysing the project which are not
excluded from config properly. So if you install them, uninstall before exporting config.

GovCMS stays a little behind latest by pinning modules. So sometimes you do need to fiddle with
the composer.json to make it match the desired packages. This is the number one reason why I
consider this a personal tool - I only update it when I'm working on GovCMS SaaS project.

I usually have a separate standard govcms build locally on demand. I use it to run ship-shape etc,
or to compare what packages are being built in my client's project. I don't install pygmy or 
anything, I just use CLI to interact with it.

I'm happy to discuss any of this in Drupal Slack #govcms, but this is really just for open source 
sharing.

## Command reminders

```
ddev drush sapi-l
ddev drush sapi-i content

