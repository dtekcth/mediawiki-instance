FROM mediawiki:1.43.1
ENV MW_REL=REL1_43

WORKDIR /var/www/html/extensions
RUN git clone --depth 1 -b $MW_REL https://gerrit.wikimedia.org/r/mediawiki/extensions/UserMerge
RUN git clone --depth 1 -b $MW_REL https://gerrit.wikimedia.org/r/mediawiki/extensions/CategoryLockdown
RUN git clone --depth 1 -b $MW_REL https://gerrit.wikimedia.org/r/mediawiki/extensions/CodeMirror

WORKDIR /var/www/html/skins
RUN git clone --depth 1 -b v3.1.0 https://github.com/StarCitizenTools/mediawiki-skins-Citizen.git Citizen

WORKDIR /var/www/html
COPY ./.htaccess ./
COPY ./logo.svg ./resources/assets/
COPY ./favicon.ico ./
RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini 

