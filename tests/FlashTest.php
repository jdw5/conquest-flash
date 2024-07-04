<?php

use Conquest\Flash\Enums\MessageType;
use Conquest\Flash\Flash;
use Conquest\Flash\Messages\Banner;
use Conquest\Flash\Messages\Toast;

it('can set a simple message', function () {
    flash('Hello, World!');

    expect(session(Flash::TOAST_KEY))->toBeInstanceOf(Toast::class);
    expect(session(Flash::BANNER_KEY))->toBeNull();
});

it('can set a toast message', function () {
    flash()->toast('Hello, World!');
    expect(session(Flash::TOAST_KEY))->toBeInstanceOf(Toast::class);
    expect(session(Flash::TOAST_KEY))->getDuration()->toBe(5000);
    expect(session(Flash::BANNER_KEY))->toBeNull();

});

it('can set a banner message', function () {
    flash()->banner('Hello, World!');
    expect(session(Flash::BANNER_KEY))->toBeInstanceOf(Banner::class);
    expect(session(Flash::TOAST_KEY))->toBeNull();
});

it('can set a toast class', function () {
    $toast = Toast::make('Hello, World!', 'This is a description', MessageType::SUCCESS);
    flash()->toast($toast);
    expect(session(Flash::TOAST_KEY))->toBeInstanceOf(Toast::class);
    expect(session(Flash::TOAST_KEY)->getType())->toBe(MessageType::SUCCESS->value);
    expect(session(Flash::BANNER_KEY))->toBeNull();
});

it('can set both a toast and banner message', function () {
    flash('Hello, World!', 'This is a description', MessageType::ERROR);
    flash('Hello, World!', 'This is a description', 'custom', false);
    expect(session(Flash::TOAST_KEY))->toBeInstanceOf(Toast::class);
    expect(session(Flash::TOAST_KEY)->getType())->toBe(MessageType::ERROR->value);
    expect(session(Flash::BANNER_KEY))->toBeInstanceOf(Banner::class);
    expect(session(Flash::BANNER_KEY)->getType())->toBe('custom');
});

it('can retrieve flash notifications', function () {
    flash()->toast('Hello, World!');
    flash()->banner('Hello, World!');
    expect(Flash::messages())->toBe([
        'toast' => session(Flash::TOAST_KEY),
        'banner' => session(Flash::BANNER_KEY),
    ]);
});

it('can set a global flash duration', function () {
    Toast::setGlobalFlashDuration(10000);
    flash()->toast('Hello, World!');
    expect(session(Flash::TOAST_KEY)->getDuration())->toBe(10000);
});
