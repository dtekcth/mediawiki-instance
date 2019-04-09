FROM mediawiki

WORKDIR /var/www/html/temp

COPY ./extensions .

WORKDIR /var/www/html/temp/WYSIWYG-CKeditor
RUN git checkout 9ab60b
RUN cp SemanticForms ../../extensions/SemanticForms -r
RUN cp WikiEditor ../../extensions/WikiEditor -r
RUN cp WYSIWYG ../../extensions/WYSIWYG -r

WORKDIR /var/www/html/temp
RUN cp UserMerge ../extensions/UserMerge -r
RUN cp VisualEditor ../extensions/VisualEditor -r

WORKDIR /var/www/html
RUN rm temp -r
