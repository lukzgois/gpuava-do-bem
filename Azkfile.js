systems({
  "gpuava-do-bem": {
    // Dependent systems
    depends: ['postgres'], // postgres, mysql, mongodb ...
    // More images:  http://images.azk.io
    image: {"docker": "lukz/php-fpm"},
    // Steps to execute before running instances
    provision: [
      // "composer install",
    ],
    workdir: "/azk/#{manifest.dir}",
    shell: "/bin/bash",
    wait: {"retry": 20, "timeout": 1000},
    mounts: {
      '/azk/#{manifest.dir}': path(".")
    },
    scalable: {"default": 1},
    http: {
      // app.dev.azk.io
      domains: [ "#{system.name}.#{azk.default_domain}" ]
    },
    ports: {
      // exports global variables
      http: "80/tcp",
    },
    envs: {
      // set instances variables
      APP_DIR: "/azk/#{manifest.dir}",
    },
  },
  postgres: {
    // More info about postgres image: http://images.azk.io/#/postgres?from=images-azkfile-postgres
    image: {"docker": "azukiapp/postgres:9.4"},
    shell: "/bin/bash",
    wait: {"retry": 25, "timeout": 1000},
    mounts: {
      '/var/lib/postgresql/data': persistent("#{system.name}-data"),
      // to clean postgres data, run:
      // $ azk shell postgres -c "rm -rf /var/lib/postgresql/data/*"
    },
    ports: {
      // exports global variables: "#{net.port.data}"
      data: "5432/tcp",
    },
    envs: {
      // set instances variables
      DB_USERNAME: "azk",
      DB_PASSWORD: "azk",
      DB_DATABASE  : "gpuavadobem",
    },
    export_envs: {
      DB_URL: "postgres://#{envs.POSTGRES_USER}:#{envs.POSTGRES_PASS}@#{net.host}:#{net.port.data}/#{envs.POSTGRES_DB}",
      DB_USERNAME: "#{envs.DB_USERNAME}",
      DB_PASSWORD: "#{envs.DB_PASSWORD}",
      DB_HOST: "#{net.host}",
      DB_PORT: "#{net.port.data}",
      DB_DATABASE  : "#{envs.DB_DATABASE}",
    },
  },
});