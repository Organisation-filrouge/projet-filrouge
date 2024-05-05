FROM nginx:alpine

# Remove any duplicate "daemon" directives from nginx.conf
RUN sed -i '/daemon/d' /etc/nginx/nginx.conf

# Create the log directory and set appropriate permissions
RUN mkdir -p /var/log/nginx && \
    touch /var/log/nginx/error.log && \
    chown -R nginx:nginx /var/log/nginx

# Set the working directory
WORKDIR /var/www

# Copy your web content into the container
COPY . .

# Expose ports
EXPOSE 80 443

# Start nginx
CMD ["nginx"]
