#!/bin/sh
# Download and maybe activate external plugins
if wp plugin is-installed hello-dolly; then
    wp plugin activate hello-dolly
else
    wp plugin install hello-dolly --activate
fi

# Activate own plugins
wp plugin activate gatographql-hello-dolly


# Activate own plugins
wp plugin activate gatographql-again-nathan-bro

# Download and maybe activate external plugins
if wp plugin is-installed woocommerce; then
    wp plugin activate woocommerce
else
    wp plugin install woocommerce --activate
fi

# Activate own plugins
wp plugin activate gatographql-woocommerce
