<?php

namespace pxlrbt\FilamentImageCompare\Filament;

use Closure;
use Filament\Infolists\Components\ImageEntry;
use pxlrbt\FilamentFavicon\Support\FaviconService;

class ImageCompareEntry extends ImageEntry
{
    public string|Closure|null $leftImage;
    public string|Closure|null $rightImage;

    public static function getDefaultName(): ?string
    {
        return 'image-compare';
    }

    public function leftImage(string|Closure|null $image): static
    {
        $this->leftImage = $image;

        return $this;
    }

    public function rightImage(string|Closure|null $image): static
    {
        $this->rightImage = $image;

        return $this;
    }

    public function toEmbeddedHtml(): string
    {
        $leftImageUrl = $this->getImageUrl($this->evaluate($this->leftImage));
        $rightImageUrl = $this->getImageUrl($this->evaluate($this->rightImage));

        if (blank($leftImageUrl) || blank($rightImageUrl)) {
            return '';
        }


        $attributes = $this->getExtraAttributeBag()
            ->class([
                'fi-in-image-compare',
            ])
            ->merge([
                'wire:ingore',
                'x-init' => <<<JS
                    () => {
                        const clippedImage = \$el.querySelector('.image-2-wrapper img');
                        const clippingSlider = \$el.querySelector('.image-compare-input');

                        clippingSlider.addEventListener('input', (event) => {
                            const newValue = `\${event.target.value}%`
                            clippedImage.style.setProperty('--exposure', newValue)
                        })
                    }
                JS
            ],  escape: false);

        return $this->wrapEmbeddedHtml(<<<BLADE
            <div {$attributes->toHtml()}>
                <img src="{$leftImageUrl}" class="image-1" >

                <div class="image-2-wrapper">
                    <img src="{$rightImageUrl}" class="image-2">
                </div>

                <label>
                    <span class="fi-sr-only">Select what percentage of the bottom image to show</span>
                    <input type="range" min="0" max="100" class="image-compare-input">
                </label>
            </div>
        BLADE);
    }
}
