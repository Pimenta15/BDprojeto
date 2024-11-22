<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold"><?php echo $title; ?></h1>
    <a href="<?php echo base_url(); ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Voltar para o Hub</a>
</div>
<a href="<?php echo base_url('planos-saude/criar'); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Adicionar Plano de Saúde</a>
<table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Nome do Plano</th>
            <th class="p-3 text-left">Cobertura</th>
            <th class="p-3 text-left">Mensalidade</th>
            <th class="p-3 text-left">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($planos_saude as $plano): ?>
            <tr>
                <td class="p-3"><?php echo $plano['id_plano']; ?></td>
                <td class="p-3"><?php echo $plano['nome_plano']; ?></td>
                <td class="p-3"><?php echo $plano['corbertura']; ?></td>
                <td class="p-3">R$ <?php echo number_format($plano['mensalidade'], 2, ',', '.'); ?></td>
                <td class="p-3">
                    <a href="<?php echo base_url('planos-saude/editar/'.$plano['id_plano']); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded mr-2">Editar</a>
                    <a href="<?php echo base_url('planos-saude/excluir/'.$plano['id_plano']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded"
                       onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>