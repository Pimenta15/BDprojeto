<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold"><?php echo $title; ?></h1>
    <a href="<?php echo base_url(); ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Voltar para o Hub</a>
</div>
<a href="<?php echo base_url('localizacoes/criar'); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Adicionar Local</a>
<table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Nome do Local</th>
            <th class="p-3 text-left">Mensalidade</th>
            <th class="p-3 text-left">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($localizacoes as $local): ?>
            <tr>
                <td class="p-3"><?php echo $local['id_localizacao']; ?></td>
                <td class="p-3"><?php echo $local['nome_local']; ?></td>
                <td class="p-3"><?php echo $local['capacidade']; ?></td>
                <td class="p-3">
                    <a href="<?php echo base_url('localizacoes/editar/'.$local['id_localizacao']); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded mr-2">Editar</a>
                    <a href="<?php echo base_url('localizacoes/excluir/'.$local['id_localizacao']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded"
                       onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>