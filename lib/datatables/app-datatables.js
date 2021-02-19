const language = {
    search: 'Buscar',
    paginate: {
        first: 'Primero',
        last: 'Último',
        next: 'Siguiente',
        previous: 'Anterior'
    },
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    // count: {'total'},
    // countFiltered: {'shown'} "({total})",
    emptyPanes: 'Sin paneles de búsqueda',
    loadMessage: 'Cargando paneles de búsqueda',
    title: 'Filtros Activos - %d'
};


/**
 * 
 * @param {*} selectorID table id
 * @param {*} language options ES EN
 */
const dataTable = (selectorID, languageCode) => {


    $(`#${selectorID}`).dataTable({
        language,
    });
};

// $('#tablaClientes').dataTable({
//     language: {
//         search: 'Buscar',
//         paginate: {
//             first: 'Primero',
//             last: 'Último',
//             next: 'Siguiente',
//             previous: 'Anterior'
//         },
//         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
//         "processing": "Procesando...",
//         "lengthMenu": "Mostrar _MENU_ registros",
//         "zeroRecords": "No se encontraron resultados",
//         "emptyTable": "Ningún dato disponible en esta tabla",
//         // count: {'total'},
//         // countFiltered: {'shown'} "({total})",
//         emptyPanes: 'Sin paneles de búsqueda',
//         loadMessage: 'Cargando paneles de búsqueda',
//         title: 'Filtros Activos - %d'
//     }
// });
