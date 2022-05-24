<?php

    function navBarElementHTML(array $element): string
    {
        return '<li class="nav-item">
                    <a class="nav-link" href=' . URL::site($element['url']) . ">${element["name"]}</a>
                </li>";
    }