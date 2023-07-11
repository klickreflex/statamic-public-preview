# Statamic Public Preview

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

Statamic Public Preview is a package that provides an action for generating public preview links for your Statamic websites. With this package, you can easily share a temporary preview of your site's content with clients, stakeholders, or team members without granting them full access.

## Installation

To install the Statamic Public Preview package, follow these steps:

1. Open your terminal or command prompt.
2. Navigate to your Statamic project's root directory.
3. Run the following command:

```bash
composer require modrictin/statamic-public-preview
```

This command will download and install the package and its dependencies into your Statamic project.

## Configuration

The package allows you to customize the database connection, table name, and the expiration time for preview links. To modify these settings, follow the steps below:

1. Open your terminal or command prompt.
2. Navigate to your Statamic project's root directory.
3. Run the following command to publish the configuration file:

```bash
php artisan vendor:publish --tag="public-preview-config"
```

This command will create a configuration file named `public-preview.php` in your project's `config` directory.

Open the `public-preview.php` file and modify the desired settings according to your requirements.

## Usage

Go to collection list view, and open the Action dropdown menu for the entry for which you want to generate a public preview link. Click on the `Generate Public Preview Link` option. This will generate a public preview link for the entry and redirect you to it.


## Contributing

Contributions are welcome! If you encounter any issues, have suggestions, or want to contribute enhancements or new features, please feel free to open an issue or submit a pull request on the [GitHub repository](https://github.com/modrictin/statamic-public-preview).

## License

The Statamic Public Preview package is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
