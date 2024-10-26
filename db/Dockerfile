# Directory structure:
# .
# ├── Dockerfile
# ├── init.sql
# └── docker-entrypoint-initdb.d/
#     └── 01-init.sql

# Dockerfile
FROM mysql:8.0

# Environment variables
ENV MYSQL_DATABASE=ecommerce
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_USER=maroine
ENV MYSQL_PASSWORD=maroine

# Copy SQL files
COPY init.sql /docker-entrypoint-initdb.d/01-init.sql
