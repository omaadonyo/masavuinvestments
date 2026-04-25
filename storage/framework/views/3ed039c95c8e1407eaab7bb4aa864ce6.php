<div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split($commentionsComponentPrefix . 'comments', ['record' => $record,'mentionables' => $mentionables,'polling-interval' => $pollingInterval,'paginate' => $paginate ?? true,'per-page' => $perPage ?? 5,'load-more-label' => $loadMoreLabel ?? __('commentions::comments.show_more'),'per-page-increment' => $perPageIncrement ?? null,'sidebar-enabled' => $sidebarEnabled ?? true,'show-subscribers' => $showSubscribers ?? true,'tip-tap-css-classes' => $tipTapCssClasses ?? null]);

$__keyOuter = $__key ?? null;

$__key = 'comments-modal';
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-641505171-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
</div>
<?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/vendor/kirschbaum-development/commentions/resources/views/comments-modal.blade.php ENDPATH**/ ?>