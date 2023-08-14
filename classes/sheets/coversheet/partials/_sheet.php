<h2>
    <?= e(config('app.name')); ?>
</h2>
<table style="width: 100%;table-layout: fixed;word-break: break-all;word-wrap: break-word;">
    <tbody>
        <tr>
            <td>Title</td>
            <td><?= e($title); ?></td>
        </tr>
        <tr>
            <td>Exported by</td>
            <td><?= e(\BackendAuth::user()->fullName); ?> (<?= e(\BackendAuth::user()->email); ?>)</td>
        </tr>
        <tr>
            <td>Date exported</td>
            <td><?= e(\Backend::makeCarbon(now())->format('Y-m-d g:ia')); ?></td>
        </tr>
        <tr>
            <td>Date range</td>
            <td>
                <?= e(\Backend::makeCarbon($period[0])->format('Y-m-d')); ?>
                -
                <?= e(\Backend::makeCarbon($period[1])->format('Y-m-d')); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2">Use the tabs to navigate the export data</td>
        </tr>
    </tbody>
</table>
