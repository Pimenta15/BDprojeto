<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold"><?php echo $title; ?></h1>
    <a href="<?php echo base_url(); ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Voltar para o Hub</a>
</div>
<a href="<?php echo base_url('medicos/criar'); ?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Adicionar Médico</a>
<table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3 text-left">ID</th>
            <th class="p-3 text-left">Nome</th>
            <th class="p-3 text-left">Especialidade</th>
            <th class="p-3 text-left">CRM</th>
            <th class="p-3 text-left">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medicos as $medico): ?>
            <tr>
                <td class="p-3"><?php echo $medico['id_medico']; ?></td>
                <td class="p-3"><?php echo $medico['nome']; ?></td>
                <td class="p-3"><?php echo $medico['especialidade']; ?></td>
                <td class="p-3"><?php echo $medico['CRM']; ?></td>
                <td class="p-3">
                    <a href="<?php echo base_url('medicos/editar/'.$medico['id_medico']); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded mr-2">Editar</a>
                    <a href="<?php echo base_url('medicos/excluir/'.$medico['id_medico']); ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>