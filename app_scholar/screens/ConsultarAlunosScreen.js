import React, { useState } from 'react';
import {
  StyleSheet,
  Text,
  View,
  TextInput,
  TouchableOpacity,
  ScrollView,
} from 'react-native';

export default function ConsultarAlunosScreen({ navigation }) {
  const [pesquisa, setPesquisa] = useState('');

  const alunos = [
    {
      nome: 'Aluno 1',
      cpf: '000.000.000-00',
      email: 'aluno@email.com',
      nascimento: '00/00/0000',
    },
    {
      nome: 'Aluno 2',
      cpf: '111.111.111-11',
      email: 'aluno2@email.com',
      nascimento: '00/00/0000',
    },
  ];

  const alunosFiltrados = alunos.filter((aluno) =>
    aluno.nome.toLowerCase().includes(pesquisa.toLowerCase())
  );

  return (
    <ScrollView contentContainerStyle={styles.container}>

      <Text style={styles.titulo}>Consultar Alunos</Text>

      <Text style={styles.subtitulo}>
        Pesquise um aluno
      </Text>

      <TextInput
        style={styles.pesquisa}
        placeholder="🔎  Digite o nome do aluno"
        value={pesquisa}
        onChangeText={setPesquisa}
      />

      {alunosFiltrados.map((aluno, index) => (
        <View style={styles.card} key={index}>

          <View style={styles.cabecalho}>
            <View style={styles.avatar}>
              <Text style={styles.avatarTexto}>
                {aluno.nome.charAt(0)}
              </Text>
            </View>

            <Text style={styles.nome}>
              {aluno.nome}
            </Text>
          </View>

          <View style={styles.info}>
            <Text style={styles.label}>CPF</Text>
            <Text style={styles.valor}>{aluno.cpf}</Text>

            <Text style={styles.label}>E-mail</Text>
            <Text style={styles.valor}>{aluno.email}</Text>

            <Text style={styles.label}>Nascimento</Text>
            <Text style={styles.valor}>{aluno.nascimento}</Text>
          </View>

        </View>
      ))}

      {alunosFiltrados.length === 0 && (
        <View style={styles.vazio}>
          <Text style={styles.vazioTitulo}>
            Nenhum aluno encontrado
          </Text>

          <Text style={styles.vazioTexto}>
            Tente pesquisar por outro nome.
          </Text>
        </View>
      )}

      <TouchableOpacity
        style={styles.voltar}
        onPress={() => navigation.goBack()}
      >
        <Text style={styles.textoVoltar}>
          ← Voltar
        </Text>
      </TouchableOpacity>

    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    padding: 25,
    paddingTop: 35,
  },

  titulo: {
    fontSize: 32,
    fontWeight: 'bold',
    textAlign: 'center',
    marginBottom: 5,
  },

  subtitulo: {
    fontSize: 16,
    textAlign: 'center',
    opacity: 0.6,
    marginBottom: 25,
  },

  pesquisa: {
    borderWidth: 1,
    borderRadius: 14,
    padding: 16,
    fontSize: 16,
    marginBottom: 20,
  },

  card: {
    borderWidth: 1,
    borderRadius: 18,
    padding: 18,
    marginBottom: 15,
    elevation: 3,
  },

  cabecalho: {
    flexDirection: 'row',
    alignItems: 'center',
    marginBottom: 15,
  },

  avatar: {
    width: 48,
    height: 48,
    borderRadius: 24,
    alignItems: 'center',
    justifyContent: 'center',
    marginRight: 12,
  },

  avatarTexto: {
    fontSize: 21,
    fontWeight: 'bold',
  },

  nome: {
    fontSize: 20,
    fontWeight: 'bold',
  },

  info: {
    paddingLeft: 60,
  },

  label: {
    fontSize: 12,
    fontWeight: 'bold',
    opacity: 0.55,
    marginTop: 7,
  },

  valor: {
    fontSize: 15,
    marginTop: 2,
  },

  vazio: {
    alignItems: 'center',
    marginTop: 35,
  },

  vazioTitulo: {
    fontSize: 18,
    fontWeight: 'bold',
  },

  vazioTexto: {
    fontSize: 14,
    opacity: 0.6,
    marginTop: 5,
  },

  voltar: {
    alignItems: 'center',
    marginTop: 15,
    paddingVertical: 12,
  },

  textoVoltar: {
    fontSize: 16,
    fontWeight: 'bold',
  },
});