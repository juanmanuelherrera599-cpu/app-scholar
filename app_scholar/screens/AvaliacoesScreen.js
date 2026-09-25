import React from 'react';
import {
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  ScrollView,
} from 'react-native';

export default function AvaliacoesScreen({ navigation }) {
  return (
    <ScrollView contentContainerStyle={styles.container}>

      <Text style={styles.icone}>📊</Text>

      <Text style={styles.titulo}>Avaliações</Text>

      <Text style={styles.subtitulo}>
        Cadastro de avaliação
      </Text>

      <TextInput
        style={styles.input}
        placeholder="Aluno"
      />

      <TextInput
        style={styles.input}
        placeholder="Disciplina"
      />

      <TextInput
        style={styles.input}
        placeholder="Professor"
      />

      <TextInput
        style={styles.input}
        placeholder="Nota"
        keyboardType="numeric"
      />

      <TextInput
        style={styles.input}
        placeholder="Data da avaliação"
      />

      <TextInput
        style={styles.input}
        placeholder="Descrição da avaliação"
      />

      <TouchableOpacity
        style={styles.botao}
        onPress={() => alert('Avaliação cadastrada com sucesso!')}
        activeOpacity={0.8}
      >
        <Text style={styles.textoBotao}>
          ✓  Cadastrar Avaliação
        </Text>
      </TouchableOpacity>

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
    paddingTop: 30,
  },

  icone: {
    fontSize: 42,
    textAlign: 'center',
    marginBottom: 5,
  },

  titulo: {
    fontSize: 32,
    fontWeight: 'bold',
    textAlign: 'center',
  },

  subtitulo: {
    fontSize: 16,
    textAlign: 'center',
    opacity: 0.6,
    marginTop: 5,
    marginBottom: 28,
  },

  input: {
    borderWidth: 1,
    borderRadius: 14,
    padding: 16,
    marginBottom: 15,
    fontSize: 16,
  },

  botao: {
    borderRadius: 14,
    paddingVertical: 16,
    alignItems: 'center',
    marginTop: 8,
    elevation: 4,
  },

  textoBotao: {
    fontSize: 17,
    fontWeight: 'bold',
  },

  voltar: {
    alignItems: 'center',
    marginTop: 20,
    paddingVertical: 12,
  },

  textoVoltar: {
    fontSize: 16,
    fontWeight: 'bold',
  },
});