<?php
require 'vendor/autoload.php';
require 'src/bootstrap.php';

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

// 1. Inserta al menos 5 registros -> Ya hecho en migrate.php seeding
echo "1) Registros insertados (users count): " . User::count() . "\n";

// 2. Recupera todos los pedidos asociados al usuario con ID 2.
echo "\n2) Pedidos del usuario ID 2:\n";
$orders_user2 = Order::where('user_id',2)->get();
foreach ($orders_user2 as $o) {
    echo "- Order #{$o->id}: {$o->product}, qty: {$o->quantity}, total: {$o->total}\n";
}

// 3. Información detallada de los pedidos, incluyendo nombre y correo del usuario.
echo "\n3) Pedidos con información de usuario:\n";
$orders_with_user = Order::with('user')->get();
foreach ($orders_with_user as $o) {
    echo "- Order #{$o->id}: {$o->product}, total: {$o->total} | User: {$o->user->name} ({$o->user->email})\n";
}

// 4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
echo "\n4) Pedidos con total entre 100 y 250:\n";
$range = Order::whereBetween('total',[100,250])->get();
foreach ($range as $r) {
    echo "- Order #{$r->id}: {$r->product}, total: {$r->total}\n";
}

// 5. Encuentra todos los usuarios cuyos nombres comiencen con la letra \"R\".
echo "\n5) Usuarios con nombre que inicia con R:\n";
$usersR = User::where('name','like','R%')->get();
foreach ($usersR as $u) {
    echo "- {$u->id}: {$u->name} ({$u->email})\n";
}

// 6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
echo "\n6) Conteo de pedidos para usuario ID 5: ";
$count5 = Order::where('user_id',5)->count();
echo $count5 . "\n";

// 7. Recupera todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido.
echo "\n7) Pedidos con usuario, ordenados por total descendente:\n";
$ordered = Order::with('user')->orderBy('total','desc')->get();
foreach ($ordered as $o) {
    echo "- Order #{$o->id}: {$o->product}, total: {$o->total} | User: {$o->user->name}\n";
}

// 8. Obtén la suma total del campo \"total\" en la tabla de pedidos.
echo "\n8) Suma total de todos los pedidos: ";
$sumTotal = Order::sum('total');
echo $sumTotal . "\n";

// 9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
echo "\n9) Pedido más económico con nombre de usuario:\n";
$minOrder = Order::with('user')->orderBy('total','asc')->first();
if ($minOrder) {
    echo "- Order #{$minOrder->id}: {$minOrder->product}, total: {$minOrder->total} | User: {$minOrder->user->name}\n";
}

// 10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
echo "\n10) Producto, cantidad y total por pedido agrupando por usuario:\n";
// We'll group by user and show their orders
$users = User::with('orders')->get();
foreach ($users as $u) {
    echo "User: {$u->name}\n";
    foreach ($u->orders as $o) {
        echo "  - Product: {$o->product}, qty: {$o->quantity}, total: {$o->total}\n";
    }
}

// 11. (Espacio para ejercicios adicionales)
echo "\n11) Ejercicio adicional: Listar totales por usuario:\n";
$totals = Order::selectRaw('user_id, SUM(total) as total_sum, COUNT(*) as orders_count')
    ->groupBy('user_id')->get();
foreach ($totals as $t) {
    $user = User::find($t->user_id);
    echo "- {$user->name}: orders={$t->orders_count}, sum={$t->total_sum}\n";
}

echo "\nFinished.\n";
