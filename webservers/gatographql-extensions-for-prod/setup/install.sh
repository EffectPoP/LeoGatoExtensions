#!/bin/sh
wp core install --url="gatographql-caponga-maronga-55-extensions-for-prod.lndo.site" --title="Gato GraphQL for PROD" --admin_user=admin --admin_password=admin --admin_email=admin@example.com 
wp option update siteurl "https://gatographql-caponga-maronga-55-extensions-for-prod.lndo.site" 
wp option update home "https://gatographql-caponga-maronga-55-extensions-for-prod.lndo.site" 
# This change is needed on InstaWP
# wp option update admin_email "admin@example.com"
