
FROM centos:centos7

RUN yum -y install httpd php && \
    yum -y install php-mysql && \
    yum clean all

RUN rm -fr /etc/httpd/conf.d
ADD httpd /etc/httpd

ADD www /var/www/html

EXPOSE 8080

ENTRYPOINT ["/usr/sbin/httpd", "-f", "/etc/httpd/conf/httpd.conf", "-DFOREGROUND"]
