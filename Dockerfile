FROM mediawiki

WORKDIR /var/www/html/temp

COPY ./.git ./.git
COPY ./extensions ./extensions

WORKDIR /var/www/html/temp
RUN cp extensions/UserMerge ../extensions/UserMerge -r
RUN cp extensions/VisualEditor ../extensions/VisualEditor -r
RUN cp extensions/WhitelistNamespaces.php ../extensions/WhitelistNamespaces.php -r

WORKDIR /var/www/html
RUN rm temp -r
