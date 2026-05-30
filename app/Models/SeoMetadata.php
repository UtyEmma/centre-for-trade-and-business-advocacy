<?php

namespace App\Models;

use RalphJSmit\Laravel\SEO\Models\SEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class SeoMetadata extends SEO
{
    public function prepareForUsage(): SEOData
    {
        $model = $this->model;
        $dynamicData = $model && method_exists($model, 'getDynamicSEOData')
            ? $model->getDynamicSEOData()
            : new SEOData;

        $enableTitleSuffix = $dynamicData->enableTitleSuffix;

        if ($model && method_exists($model, 'enableTitleSuffix')) {
            $enableTitleSuffix = $model->enableTitleSuffix();
        } elseif ($model && property_exists($model, 'enableTitleSuffix')) {
            $enableTitleSuffix = $model->enableTitleSuffix;
        }

        return new SEOData(
            title: $this->storedAttribute('title') ?? $dynamicData->title,
            description: $this->storedAttribute('description') ?? $dynamicData->description,
            author: $this->storedAttribute('author') ?? $dynamicData->author,
            image: $this->storedAttribute('image') ?? $dynamicData->image,
            url: $dynamicData->url,
            enableTitleSuffix: $enableTitleSuffix,
            published_time: $dynamicData->published_time ?? $model?->created_at,
            modified_time: $dynamicData->modified_time ?? $model?->updated_at,
            articleBody: $dynamicData->articleBody,
            section: $dynamicData->section,
            tags: $dynamicData->tags,
            twitter_username: $dynamicData->twitter_username,
            schema: $dynamicData->schema,
            type: $dynamicData->type,
            site_name: $dynamicData->site_name,
            favicon: $dynamicData->favicon,
            locale: $dynamicData->locale,
            robots: $this->storedAttribute('robots') ?? $dynamicData->robots,
            canonical_url: $this->storedAttribute('canonical_url') ?? $dynamicData->canonical_url,
            openGraphTitle: $dynamicData->openGraphTitle,
            alternates: $dynamicData->alternates,
        );
    }

    protected function storedAttribute(string $key): ?string
    {
        $value = $this->getAttributes()[$key] ?? null;

        return filled($value) ? (string) $value : null;
    }
}
