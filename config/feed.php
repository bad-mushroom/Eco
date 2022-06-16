<?php

return [
    'feeds' => [

        /**
         * Atom Posts Feed
         *
         * @see https://github.com/spatie/laravel-feed
         */
        'main' => [
            'items'       => [App\Models\Story::class, 'getAllFeedItems'],
            'url'         => '/feed',
            'title'       => 'My feed',
            'description' => 'The description of the feed.',
            'language'    => 'en-US',
            'format'      => 'atom',
            'view'        => 'feed::atom',
            'type'        => '',
            'contentType' => '',
        ],
    ],
];
