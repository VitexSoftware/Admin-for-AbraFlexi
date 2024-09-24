<?php

declare(strict_types=1);

/**
 * This file is part of the Admin-for-AbraFlexi package
 *
 * https://github.com/VitexSoftware/Admin-for-AbraFlexi
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AbraFlexi\Admin\Ui;

/**
 * Description of PageBottom.
 *
 * @author Vitex <info@vitexsoftware.cz>
 */
class PageBottom extends \Ease\Html\FooterTag
{
    public function __construct($content = null, array $properties = [])
    {
        parent::__construct($content, $properties);

        $this->addItem(new \Ease\TWB5\Container(\Ease\TWB5\WebPage::singleton()->getStatusMessagesBlock(), ['style' => 'padding: 10px; margin: 10px;']));

        $this->addItem(new \Ease\Html\HrTag());

        $footrow = new \Ease\TWB5\Row();

        $author = '<strong>'._('AbraFlexi Admin').'</strong> '.\Ease\Shared::appVersion().'<br>&nbsp;&nbsp; &copy; 2024 <a href="https://vitexsoftware.com/">VitexSoftware</a>';
        $footrow->addColumn(6, [$author]);
        $github = new \Ease\Html\ATag('https://github.com/Spoje-NET/', new \Ease\Html\ImgTag('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAyNCIgaGVpZ2h0PSIxMDI0IiB2aWV3Qm94PSIwIDAgMTAyNCAxMDI0IiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTggMEMzLjU4IDAgMCAzLjU4IDAgOEMwIDExLjU0IDIuMjkgMTQuNTMgNS40NyAxNS41OUM1Ljg3IDE1LjY2IDYuMDIgMTUuNDIgNi4wMiAxNS4yMUM2LjAyIDE1LjAyIDYuMDEgMTQuMzkgNi4wMSAxMy43MkM0IDE0LjA5IDMuNDggMTMuMjMgMy4zMiAxMi43OEMzLjIzIDEyLjU1IDIuODQgMTEuODQgMi41IDExLjY1QzIuMjIgMTEuNSAxLjgyIDExLjEzIDIuNDkgMTEuMTJDMy4xMiAxMS4xMSAzLjU3IDExLjcgMy43MiAxMS45NEM0LjQ0IDEzLjE1IDUuNTkgMTIuODEgNi4wNSAxMi42QzYuMTIgMTIuMDggNi4zMyAxMS43MyA2LjU2IDExLjUzQzQuNzggMTEuMzMgMi45MiAxMC42NCAyLjkyIDcuNThDMi45MiA2LjcxIDMuMjMgNS45OSAzLjc0IDUuNDNDMy42NiA1LjIzIDMuMzggNC40MSAzLjgyIDMuMzFDMy44MiAzLjMxIDQuNDkgMy4xIDYuMDIgNC4xM0M2LjY2IDMuOTUgNy4zNCAzLjg2IDguMDIgMy44NkM4LjcgMy44NiA5LjM4IDMuOTUgMTAuMDIgNC4xM0MxMS41NSAzLjA5IDEyLjIyIDMuMzEgMTIuMjIgMy4zMUMxMi42NiA0LjQxIDEyLjM4IDUuMjMgMTIuMyA1LjQzQzEyLjgxIDUuOTkgMTMuMTIgNi43IDEzLjEyIDcuNThDMTMuMTIgMTAuNjUgMTEuMjUgMTEuMzMgOS40NyAxMS41M0M5Ljc2IDExLjc4IDEwLjAxIDEyLjI2IDEwLjAxIDEzLjAxQzEwLjAxIDE0LjA4IDEwIDE0Ljk0IDEwIDE1LjIxQzEwIDE1LjQyIDEwLjE1IDE1LjY3IDEwLjU1IDE1LjU5QzEzLjcxIDE0LjUzIDE2IDExLjUzIDE2IDhDMTYgMy41OCAxMi40MiAwIDggMFoiIHRyYW5zZm9ybT0ic2NhbGUoNjQpIiBmaWxsPSIjMUIxRjIzIi8+Cjwvc3ZnPgo=', 'GitHub', ['width' => 25, 'title' => _('Source Code')]));
        $linkedIn = new \Ease\Html\ATag('https://www.linkedin.com/in/vitexsoftware/', new \Ease\Html\ImgTag('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyBoZWlnaHQ9IjcyIiB2aWV3Qm94PSIwIDAgNzIgNzIiIHdpZHRoPSI3MiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik04LDcyIEw2NCw3MiBDNjguNDE4Mjc4LDcyIDcyLDY4LjQxODI3OCA3Miw2NCBMNzIsOCBDNzIsMy41ODE3MjIgNjguNDE4Mjc4LC04LjExNjI0NTAxZS0xNiA2NCwwIEw4LDAgQzMuNTgxNzIyLDguMTE2MjQ1MDFlLTE2IC01LjQxMDgzMDAxZS0xNiwzLjU4MTcyMiAwLDggTDAsNjQgQzUuNDEwODMwMDFlLTE2LDY4LjQxODI3OCAzLjU4MTcyMiw3MiA4LDcyIFoiIGZpbGw9IiMwMDdFQkIiLz48cGF0aCBkPSJNNjIsNjIgTDUxLjMxNTYyNSw2MiBMNTEuMzE1NjI1LDQzLjgwMjExNDkgQzUxLjMxNTYyNSwzOC44MTI3NTQyIDQ5LjQxOTc5MTcsMzYuMDI0NTMyMyA0NS40NzA3MDMxLDM2LjAyNDUzMjMgQzQxLjE3NDYwOTQsMzYuMDI0NTMyMyAzOC45MzAwNzgxLDM4LjkyNjExMDMgMzguOTMwMDc4MSw0My44MDIxMTQ5IEwzOC45MzAwNzgxLDYyIEwyOC42MzMzMzMzLDYyIEwyOC42MzMzMzMzLDI3LjMzMzMzMzMgTDM4LjkzMDA3ODEsMjcuMzMzMzMzMyBMMzguOTMwMDc4MSwzMi4wMDI5MjgzIEMzOC45MzAwNzgxLDMyLjAwMjkyODMgNDIuMDI2MDQxNywyNi4yNzQyMTUxIDQ5LjM4MjU1MjEsMjYuMjc0MjE1MSBDNTYuNzM1Njc3MSwyNi4yNzQyMTUxIDYyLDMwLjc2NDQ3MDUgNjIsNDAuMDUxMjEyIEw2Miw2MiBaIE0xNi4zNDkzNDksMjIuNzk0MDEzMyBDMTIuODQyMDU3MywyMi43OTQwMTMzIDEwLDE5LjkyOTY1NjcgMTAsMTYuMzk3MDA2NyBDMTAsMTIuODY0MzU2NiAxMi44NDIwNTczLDEwIDE2LjM0OTM0OSwxMCBDMTkuODU2NjQwNiwxMCAyMi42OTcwMDUyLDEyLjg2NDM1NjYgMjIuNjk3MDA1MiwxNi4zOTcwMDY3IEMyMi42OTcwMDUyLDE5LjkyOTY1NjcgMTkuODU2NjQwNiwyMi43OTQwMTMzIDE2LjM0OTM0OSwyMi43OTQwMTMzIFogTTExLjAzMjU1MjEsNjIgTDIxLjc2OTQwMSw2MiBMMjEuNzY5NDAxLDI3LjMzMzMzMzMgTDExLjAzMjU1MjEsMjcuMzMzMzMzMyBMMTEuMDMyNTUyMSw2MiBaIiBmaWxsPSIjRkZGIi8+PC9nPjwvc3ZnPg==', 'LinkedIN', ['height' => '25px', 'style' => 'margin: 20x', 'title' => _('LinkedIN Producer page')]));

        $footrow->addColumn(6, [$github, '&nbsp;', $linkedIn]);

        $this->addItem(new \Ease\TWB5\Container($footrow));
    }
}
