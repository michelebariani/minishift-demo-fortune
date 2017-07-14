FROM centos:centos7
MAINTAINER "Michele Bariani" <michele.bariani@docomodigital.com>

RUN yum -y install httpd php && \
    yum clean all && \
    rm -fr /etc/httpd/conf.d
ADD httpd /etc/httpd

ONBUILD ADD www /var/www/html
ONBUILD RUN chgrp -R 0 /etc/httpd /var/www/html /usr/lib64/httpd/modules /run/httpd && \
            chmod -R g+rwX /etc/httpd /var/www/html /usr/lib64/httpd/modules /run/httpd

EXPOSE 8080
ENTRYPOINT ["/usr/sbin/httpd", "-f", "/etc/httpd/conf/httpd.conf", "-DFOREGROUND"]
