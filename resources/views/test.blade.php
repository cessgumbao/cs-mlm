<?php

$response = Gate::inspect('viewAny', 'App\Distributor');

if ($response->allowed()) {
    // The action is authorized...
} else {
    echo $response->message();
}

?>