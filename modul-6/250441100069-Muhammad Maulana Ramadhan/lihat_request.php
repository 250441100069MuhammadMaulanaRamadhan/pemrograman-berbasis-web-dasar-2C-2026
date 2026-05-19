<?php
include 'auth.php';
hanya_admin();
include 'koneksi.php';
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-100 p-6">

    <div class="flex justify-between items-center mb-5">
        <h2 class="text-2xl font-bold text-gray-800">Request Top Up</h2>
        <a href="tampil.php" class="text-blue-500 hover:underline">
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="p-3">User ID</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $data=$conn->query("SELECT * FROM topup_request ORDER BY id DESC");
            while($r=$data->fetch_assoc()):
            ?>

                <tr class="border-b hover:bg-gray-50 transition text-center">

                    <td class="p-3 font-medium text-gray-700">
                        <?= $r['user_id'] ?>
                    </td>

                    <td class="p-3 text-green-600 font-semibold">
                        Rp <?= number_format($r['jumlah']) ?>
                    </td>

                    <td class="p-3">
                        <?php if($r['status']=='pending'): ?>
                            <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full">
                                Pending
                            </span>
                        <?php else: ?>
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                Selesai
                            </span>
                        <?php endif; ?>
                    </td>

                    <td class="p-3">

                        <?php if($r['status']=='pending'): ?>
                            <a href="acc_topup.php?id=<?= $r['id'] ?>"
                                class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition">
                                ACC
                            </a>
                        <?php else: ?>
                            <span class="text-gray-400 text-sm">Selesai</span>
                        <?php endif; ?>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>
        </table>

    </div>

</div>