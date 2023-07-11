<?php

namespace Modrictin\StatamicPublicPreview\Actions;

use Modrictin\StatamicPublicPreview\Models\EntryPublicPreview;
use Statamic\Actions\Action;
use Statamic\Entries\Entry;

class GeneratePublicPreviewLink extends Action
{
    public function confirmationText(): string
    {
        return 'This will create a unique public review link that is valid for '.config('statamic-public-preview.valid_for').' days.
         If you run this action twice, previously created public review links for the same entry will not be overwritten.
         You will be redirected to the preview link after running this action.';
    }

    public function buttonText(): string
    {
        return 'Generate public preview link and redirect me there';
    }

    public function visibleTo($item): bool
    {
        return $item instanceof Entry;
    }

    public function visibleToBulk($items)
    {
        return parent::visibleTo($items) && $items->count() === 1;
    }

    public function run($items, $values): void
    {
        foreach ($items as $item) {
            EntryPublicPreview::updateOrCreate(
                ['entry_id' => $item->id()], // Search array
                ['valid_until' => now()->addSeconds(config('statamic-public-preview.valid_for'))] // Update or Create array
            );
        }
    }

    public function redirect($items, $values)
    {
        $publicPreview = EntryPublicPreview::firstWhere('entry_id', '=', $items[0]->id());

        return route('cms.public-preview', ['id' => $publicPreview->id]);
    }
}
