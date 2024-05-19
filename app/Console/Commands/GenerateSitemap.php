<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use vakazona\SitemapGenerator\DTO\SitemapData;
use vakazona\SitemapGenerator\SitemapGenerator;
use vakazona\SitemapGenerator\Validator\SitemapValidator;


class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pages = [
            ['loc' => 'https://example.com/page1', 'lastmod' => '2024-05-11', 'priority' => 0.8, 'changefreq' => 'daily'],
            ['loc' => 'https://example.com/page2', 'lastmod' => '2024-05-10', 'priority' => 0.5, 'changefreq' => 'weekly']
        ];

        $fileType = 'json';
        $filePath = storage_path('/app/upload/sitemap.json');


        $sitemapGenerator = new SitemapGenerator(new SitemapValidator());
        $sitemapGenerator->generateSitemap(new SitemapData([
            'pages' => $pages,
            'fileType' => $fileType,
            'filePath' => $filePath,
        ]));

        $this->info('Sitemap generated successfully.');
    }
}
