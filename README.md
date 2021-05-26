# Rapidez Mageplaza Blog

## Requirements

You need to have the [Mageplaza Blog](https://www.mageplaza.com/magento-2-better-blog/) module installed and configured within your Magento 2 installation.

## Installation

```
composer require rapidez/mageplaza-blog
```

After that go to the configured blog url, default: `/blog`

## Views

If you need to change the views you can publish them with:
```
php artisan vendor:publish --provider="Rapidez\MageplazaBlog\MageplazaBlogServiceProvider" --tag=views
```

## Note

Currently only the blog overview and post detail are implemented. These things are for example not implemented (yet):
- Categories
- Topics
- Tags
- Social sharing
- Comments
- Archive
- Search
- Sidebar
- Related posts/products

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
