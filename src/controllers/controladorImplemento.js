const controlador = {};

controlador.list = (req, res) => {
  req.getConnection((err, conn) => {
    conn.query('SELECT * FROM implemento', (err, auxilares) => {
     if (err) {
      res.json(err);
     }
     res.render('implementos', {
        data: auxilares
     });
    });
  });
};

controlador.save = (req, res) => {
  const data = req.body;
  console.log(req.body)
  req.getConnection((err, connection) => {
    const query = connection.query('INSERT INTO implemento set ?', data, (err, implementos) => {
      console.log(err)
      res.redirect('/');
    })
  })
};

controlador.edit = (req, res) => {
  const { id } = req.params;
  req.getConnection((err, conn) => {
    conn.query("SELECT * FROM implemento WHERE id = ?", [id], (err, rows) => {
      res.render('implementos_edit', {
        data: rows[0]
      })
    });
  });
};

controlador.update = (req, res) => {
  const { id } = req.params;
  const newimplemento = req.body;
  req.getConnection((err, conn) => {

  conn.query('UPDATE implemento set ? where id = ?', [newimplemento, id], (err, rows) => {
    res.redirect('/');
  });
  });
};

controlador.delete = (req, res) => {
  const { id } = req.params;
  req.getConnection((err, connection) => {
    connection.query('DELETE FROM implemento WHERE id = ?', [id], (err, rows) => {
      res.redirect('/');
    });
  });
}

module.exports = controlador;