// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#dataTableScore').DataTable({
      ordering: true, // Enable ordering for all columns
      order: [[3, 'desc']],
  });
});
