const controlador = {};

controlador.list = (req, res) => {
  req.getConnection((err, conn) => {
    conn.query('SELECT * FROM auxiliar', (err, auxilares) => {
     if (err) {
      res.json(err);
     }
     res.render('auxiliares', {
        data: auxilares
     });
    });
  });
};

controlador.save = (req, res) => {
  const data = req.body;
  console.log(req.body)
  req.getConnection((err, connection) => {
    const query = connection.query('INSERT INTO auxiliar set ?', data, (err, auxiliares) => {
      console.log(err)
      res.redirect('/');
    })
  })
};

controlador.edit = (req, res) => {
  const { id } = req.params;
  req.getConnection((err, conn) => {
    conn.query("SELECT * FROM auxiliar WHERE id = ?", [id], (err, rows) => {
      res.render('auxiliares_edit', {
        data: rows[0]
      })
    });
  });
};

controlador.update = (req, res) => {
  const { id } = req.params;
  const newAuxiliar = req.body;
  req.getConnection((err, conn) => {

  conn.query('UPDATE auxiliar set ? where id = ?', [newAuxiliar, id], (err, rows) => {
    res.redirect('/');
  });
  });
};

controlador.delete = (req, res) => {
  const { id } = req.params;
  req.getConnection((err, connection) => {
    connection.query('DELETE FROM auxiliar WHERE id = ?', [id], (err, rows) => {
      res.redirect('/');
    });
  });
}

module.exports = controlador;